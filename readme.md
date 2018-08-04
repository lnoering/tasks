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
    
> To Do List

- js of task.
- js of update.
- layout.
- save data of in task (finished_at)
- add attribute in task (position)
    + list them according to position.
- create abstract class for the controllers with the repeated methods.
- create state when task not having id of one.
- find for another method to show task in state.
