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
    
Create a request

    PUT /requests
    
    {
        "account_id": 1,
        "description": "test desc",
        "date": "2017-04-06",
        "amount": 122.9999,
        "limit_date": "2017-04-20",
        "picture": null,
        "status": 0
      }
      

Get a request

    GET /requests/{id}
    
Update a request

    PUT /requests/{id}
    
    {
        "account_id": 1,
        "description": "test desc",
        "date": "2017-04-06",
        "amount": 122.9999,
        "limit_date": "2017-04-20",
        "picture": null,
        "status": 0
      }
      

Get all donation for a request

    GET /requests/{id}/donations
    
Get all donations 

    GET /donations

Get a donate
    
    GET /donations/{id}
    
Update a donate
    
    PUT /donations/{id}
    
    {
        "account_id": 1,
        "request_id": 1,
        "amount": 9.99,
        "date": "2017-04-13",
        "public": 1,
        "receiver_id": null
      }
      

Get all donates news

    GET /donations/news

Get all requests news

    GET /requests/news
    
