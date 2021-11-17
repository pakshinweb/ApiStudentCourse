# ApiStudentCourse
Implement a microservice for working with a student magazine. The service has two entities: student and course. Each student can attend any number of courses.

##Deploy

### Copy project
```
git clone https://github.com/pakshinweb/ApiStudentCourse.git
```
```
cd ApiStudentCourse/app
```
### Install Docker
```
sudo apt-get update
sudo apt-get install docker-ce docker-ce-cli containerd.io
```
### Stop all Docker
```
docker stop $(docker ps -q -a)
```
### Composer
```
composer create-project
```
### Docker-compose
```
docker-compose up -d
docker-compose exec php php artisan migrate --seed
```
### Api routes
```
localhost/api/student?age=18&gender=male
localhost/api/course?id=4,1,3
```
