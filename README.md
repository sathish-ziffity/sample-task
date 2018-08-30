# Task Management System Sample Task

created one module called Ziffity_TaskManagement

### Prerequisites

Magento 2 code base

### Installation

Download zip & unzip into base directory.

```
Path: {Base Dir}/app/code/Ziffity/TaskManagement
```

#### Run the following commands to setup modules in CLI commands:

* Go to base directory

```
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy
php bin/magento cache:flush

```
* give permissions for files if needed

Once installation completed hit the below url to see the list of tasks.

```
URL: {BaseUrl}/task
```
