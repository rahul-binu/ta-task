
## PHP CodeIgniter Task

## Task

This project is used to complete the following taks:

- ## Task 1
- Create a sample PHP function to bulk insert to MySQL
- ## Task 2
- Create an API to generate a token, And get all users.


## urls

- Bulk Insert
```bash
 http://localhost/crud/task1
```
- Tocken Genration API
```bash
http://localhost/crud/task2/generateToken
```
- Find All Users API
```bash
 http://localhost/crud/task1
```
- Percentage of Duplicate Enrty API
```bash
http://localhost/crud/Task2/getDuplicatePercentage
```
# Tables
- ## users

| colum name | data type | constraints |
| -------- | -------- | -------- |
| id | int | primary key|
| fisr_name | varchar ||
| last_name | varchar |  |
| email | varchar | unique  |

- ## duplicate_count

| colum name | data type | constraints |
| -------- | -------- | -------- |
| id | int | primary key|
| email | varchar |  |
| count | int |  |
