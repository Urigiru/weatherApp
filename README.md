# weatherApp
A simple PHP commandline weather application using the openweathermap API

**NOTE: You will need an api key for the API. You can get it at: https://home.openweathermap.org/users/sign_up**

## to build the composer containers and start the documentation server:

```docker-compose --project-name weatherapp up -d```

## To run the app itself:

### For interactive weather console

 ```docker run -it -e API_KEY='YOUR OPENWEATHER API KEY' weatherapp_app bash```
 
 And then:
 
 ```weather city_name```
 
 to get the weather for your chosen city, eg:
 
 ```weather New York```
 
 ```weather Kuala Lumpur```
 
 ```weather Grzegorzewice```
 
### To quickly get weather for one town, for example, London:
 ```docker run -e API_KEY='YOUR OPENWEATHER API KEY' weatherapp_app weather London```

**Note: If you want to avoid having to provide the API key each time you run the application**, 
feel free to edit the file ```bootstrap/env.ini```
and substitute ```PUT_YOUR_KEY_HERE``` with your key

## To run the test suite:
 docker run -it weatherapp_tests run-tests

## Documentation
The documentation container by default sets up a simple web server to view the html version of the docs at http://localhost:8080/
   The port can be adjusted in the docker-compose.yml file


