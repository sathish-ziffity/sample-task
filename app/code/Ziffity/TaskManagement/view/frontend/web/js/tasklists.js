define(['jquery', 'uiComponent', 'ko', 'mage/storage'],
function ($, Component, ko, storage) {
    'use strict';
    var self;
    return Component.extend({
        lists: ko.observableArray([]),
        statusList: ['TODO', 'In Process', 'Done'],
        removeUrl: '/task/index/delete/',
        dataUrl: '/task/index/data',
        getLists: function() {
           return storage.get(
               self.dataUrl,
               ''
           ).done(
               function (response) {
                   $('#loadingList').hide();
                    if(response){
                        self.lists(JSON.parse(response));
                    }else{
                        self.showNoProducts();
                    }
                }
           ).fail(
               function (response) {
                   console.log(response);
               }
           );
        },
        getStatus: function(status){
            return '<span class="st status'+status+'">'+self.statusList[status]+'</span>';
        },
        removeItem: function(data){
            var body = $('body').loader();
            body.loader('show');
            return storage.get(
               self.removeUrl+'id/'+data.id,
               ''
           ).done(
               function (response) {
                    self.lists.remove(data);
                    self.showNoProducts();
                    body.loader('hide');
                }
           ).fail(
               function (response) {
                   console.log(response);
               }
           );
        },
        showNoProducts: function(){
            if(!self.lists().length){
                $('#loadingList').show().find('td').html('No Tasks Found');
            }
        },
        initialize: function () {
            self = this;
            self._super();
            self.getLists();
            window.getStatus = self.getStatus;
        }
    });
});