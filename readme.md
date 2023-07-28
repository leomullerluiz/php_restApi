# Simple PHP Rest API

    Personal project to understand and apply the principles of an Rest API

>Read: 
```shell
curl --request GET \
  --url http://localhost/php_restApi/api/read
```


>Search:
```shell
curl --request GET \
  --url 'http://localhost/php_restApi/api/search?term=livro'
```


>Create:
```shell
curl --request POST \
  --url 'http://localhost/php_restApi/api/create?=' \
  --header 'Content-Type: application/json' \
  --data '{
	"name": "Tenis puma"
}'
```

>Delete:
```shell
curl --request DELETE \
  --url http://localhost/php_restApi/api/delete \
  --header 'Content-Type: application/json' \
  --data '{
	"id": "15"
}'
```

>Update:
```shell
curl --request PUT \
  --url http://localhost/php_restApi/api/update \
  --header 'Content-Type: application/json' \
  --data '{
	"id": "12",
	"name": "Produto atualizado"
}'
```