
//Para la migracion de la bd
php artisan migrate:refresh --seed
CURLS
curl --location 'http://127.0.0.1:8000/api/employees'

curl --location --request DELETE 'http://127.0.0.1:8000/api/employees/4'

curl --location 'http://127.0.0.1:8000/api/employees' \
--form 'first_name="Jose"' \
--form 'last_name="Garcia"' \
--form 'email="jose2@gmail.com"' \
--form 'phone="46131012"' \
--form 'hire_date="2024-08-16"' \
--form 'salary="6500"' \
--form 'position="Developer"'

curl --location 'http://127.0.0.1:8000/api/employees/1' \
--form 'first_name="Jose"' \
--form 'last_name="Garcia"' \
--form 'email="jose@gmail.com"' \
--form 'phone="46131012"' \
--form 'hire_date="2024-08-16"' \
--form 'salary="7000"' \
--form 'position="Developers"'

curl --location 'http://127.0.0.1:8000/api/projects'

curl --location 'http://127.0.0.1:8000/api/projects' \
--form 'name="Trabajo 1"' \
--form 'description="Primer trabajo de prueba"' \
--form 'start_date="2024-08-16"' \
--form 'end_date="2024-12-16"' \
--form 'completion_percentage="0"'

curl --location 'http://127.0.0.1:8000/api/projects/1' \
--form 'name="Trabajo 1 Editado"' \
--form 'description="Primer trabajo de prueba"' \
--form 'start_date="2024-08-16"' \
--form 'end_date="2024-12-16"' \
--form 'completion_percentage="0"'

curl --location --request POST 'http://127.0.0.1:8000/api/projects/1/assign-employees?employee_id=3'