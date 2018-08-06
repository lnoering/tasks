## Beta - System to create task list.

> Dev Run

Required:
- Nginx or another.
- Php 7.1.x (limited by laravel version (5.6.x))
- Mysql

You can run with docker-compose: https://github.com/lnoering/tasks_compose

> Install

In project Folder.

- Create database (tasks)

- Run Migrations
```bash
    php artisan migrate --seed
```

- composer
```bash
    composer install
```

- npm
```bash
    npm install laravel-mix                 (required to merge files)
    npm install --save-dev cross-env        (required to npm run dev)
    npm install jquery
    npm install botstrap
    npm install poppers.js                  (required do bootstrap)  
```

> Libs
- Using to Drag (Column and Task) - https://github.com/RubaXa/Sortable
    Obs.: When used npm to generate, does not work.
- Using to create popup. - https://noelboss.github.io/featherlight/
    Obs.: Simple to get request from ajax and create.
    
> To Do List

- js of task.
    + update/change (change occurred when task move to another position ou state) 
    + delete
- js of update.
    + create
    + update/change (change occurred when state move)
    + delete
- create view to create/update state
- layout.
- save data of in task (finished_at)
- add attribute in task (position)
    + list them according to position.
- create abstract class for the controllers with the repeated methods.
- create state when task not having id of one.
- find for another method to show task in state.
- validate task and state in backend.
- validate task and state in front. (use inline)
- create new attribute in task to control the position in list.


> Finished

- install dependencies to run npm.
- make compose to run project.
- define structure of database.
- define lib to drag and drop.
- create view to list tasks and states.
- draggable task and state.
- events to get change the position of task and state.(lib providence)
- include cors to validate request from AJAX. (POST, GET, UPDATE, etc.)
- js of task
    + create