# Tawseelkom

#### Made by laravel

### Consists of:
* User (sender, manager, admin)
* Company
* Vehicle
* Order


#### Creating a *Super-admin*
```SQL
insert into users (name, email, password, phone_number, address, role) values ('<name>', '<email>', '<password>', '<phone_number>', '<address>', 'super-admin');
```

###Todo
* Dashboard page + sidebar
* vehicles {crud + search + results}
* orders {crud + search + results}
* companies {crud + search + results}
* users {crud + search + results}
* authorization middleware
* design fixes, blade templates
