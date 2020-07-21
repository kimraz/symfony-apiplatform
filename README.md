# Symfony/API-Platform boilerplate
## Setup
1. `cd app`
2. `composer install`
3. `cd ..`
4. `docker-compose build`
5. `docker-compose up -d`
## Navigation
### Swagger-UI
`http://localhost/api`
### GraphiQL/GraphQL-Playground
`http://localhost/api/graphql`
## Known Issue
If you get a GraphQL related error, try to replace all references to the class `GraphQL\Error\Debug` by `GraphQL\Error\DebugFlag` in the file/class `/app/vendor/api-platform/core/src/GraphQl/Action/EntrypointAction.php`
