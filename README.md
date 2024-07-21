<p align="center">
<h1 align="center">Marketplace Project</h1>
</p>

## important points
the project uses docker</br>

laravel pint for check  psr-12 rules</br>

./commander bash script for easier use</br>

seeder completely fills all required data</br>





> Important: This Project Requires : docker - docker-compose - php composer 
> 
> The api given in the document did not work and gave a 404 error, so I used a random number to calculate the delay time.



## Instaltion
clone this repository then : 

1 - To get docker images, install composer,migrations and db seed run this command
```
./commander initiate
```
then choose yes for every questions in cli </br>

Or
```
        1 - composer install
    
        2-  docker-compose up -d

        3 - docker exec -it marketplace_laravel.test_1 bash -c "php artisan migrate && php artisan db:seed"
```

then choose yes for every questions in cli

2 - To test code with linter run this command
```
./commander lint
```

3 - To run project
```
./commander up
```
4 - To close project
```
./commander down
```
## Api List
- Report order delay
```
"localhost/api/v1/delay-report"
method : POST
parameters (form data): 
            order_id 
```

- Assign report to agent
```
"localhost/api/v1/agent-assign"
method : post
parameters : 
            agent_id
```
- Vendors with most delay reports
```
"localhost/api/v1/vendor-delays"
method : get

```
