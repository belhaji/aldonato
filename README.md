# README #

php REST interface for the Aldonato Project



Get all accounts
    
    GET /accounts

Get an account by id

    GET /accounts/{id}
    
Create an account

    POST /accounts
    
    {
      "login": "user1",
      "password": "test",
      "name": "test",
      "category": "user"
    }
    
Update an account

    PUT /accounts/{id}
    
    {
       "login": "user1",
       "password": "test",
       "name": "test",
       "category": "user"
    }
    
Get all donations for an account

    GET /accounts/{id}/donations
    
Get all requests for an account

    GET /accounts/{id}/requests
    
Get all requests 

    GET /requests