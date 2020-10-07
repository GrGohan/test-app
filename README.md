<h2>CRUD RESTful API with Lumen</h2>

curl --location --request GET 'http://localhost:8000/api/v1/items' <br>
curl --location --request GET 'http://localhost:8000/api/v1/items/2' <br>
curl --location --request POST 'http://localhost:8000/api/v1/items/?name=test&price=100&description=test' <br>
curl --location --request PUT 'http://localhost:8000/api/v1/items/5?name=put%20test&price=100&description=put%20test' <br>
curl --location --request DELETE 'http://localhost:8000/api/v1/items/5'
