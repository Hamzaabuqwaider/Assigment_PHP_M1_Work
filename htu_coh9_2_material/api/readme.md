# TODO List API Documentation

Response Schema:
JSON OBJECT {"success": Boolean, "message_code": String, "body": Array}

GET /items

- Fetches all todo list items from the DB.
- Request arguments: none
- 404 - No item was found

POST /items/create

- Create new todo list item
- Request arguments: {"name": String}
- 422 - if name param was not provided

PUT /items/update

- flip the todo list item's completion status.
- Request arguments: {"id": Integer}
- 422 - if id param was not provided
- 404 - if item was not found

DELETE /items/delete

- delete a checklist item
- Request arguments: {"id": Integer}
- 422 - if id param was not provided
- 404 - if item was not found
