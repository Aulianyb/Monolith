# Fullstack Monolith
Nama : Aulia Nadhirah Yasmin Badrulkamal <br />
NIM : 18221066 <br />

## Cara Menjalankan 
⚠ Disclaimer : saya tidak bisa uji coba docker di mesin saya karena tidak cukup memory. Sudah di coba beberapa kali dan selalu menghabiskan memori yang ada di drive C saya sehingga mengakibatkan docker error dan harus di factory reset beberapa kali. Jadi alternatif yang bisa diberikan adalah menjalankannya secara lokal.

![image](https://github.com/Aulianyb/Monolith/assets/42485997/5a19cf1b-2e3b-439f-b88f-6ba850874422)

![image](https://github.com/Aulianyb/Monolith/assets/42485997/4cef6648-372a-4528-a2ed-b4e7e98d067a)

#### Requirements
1. PHP v8.2.8
2. mysql  Ver 8.0.30 for Win64 on x86_64 (MySQL Community Server - GPL)
3. npm v9.6.6
4. Composer version 2.5.8
5. A working single service backend on port 5000

#### How to run
1. Clone this repository
2. Run `composer i` on root
3. Run `npm install` on root to install dependencies
4. Create file `.env` and paste the contents of `.env.example`
5. Run `php artisan key:generate` on root
6. Login into mysql and create a database by running `CREATE DATABASE data;`
7. Make sure that : 
    - DB_CONNECTION=mysql
    - DB_HOST=localhost
    - DB_PORT=3306
    - DB_DATABASE=data
    - DB_USERNAME=`the username of the mysql server, typically "root"`
    - DB_PASSWORD=`the password of the mysql server`
8. run `php artisan jwt:secret` on root
9. run `php artisan migrate` to migrate the models into the database
10. run `php artisan db:seed` to seed the database
11. run `npm run dev`
12. run `php artisan serve` on another terminal and use the port to open the website, typically it's `http://127.0.0.1:8000/`

From here, you can register a new user or use the user that's inserted during seeding. From the seeding there are two user you can use : Roro and Bondowoso
#### Bondowoso
Email : Bondowoso@gmail.com <br />
Password : password123

#### Roro
Email : Roro@gmail.com <br />
Password : password123

## Design Pattern
### Singleton
Singleton dilakukan pada Validator yang ada pada AuthController, khususnya yang digunakan pada fungsi register. Design pattern ini dipilih supaya aplikasi tidak perlu mendefinisikan ulang validator yang digunakan pada register page, sehingga variabel validator yang sama dapat digunakan saat pengguna pertama kali melakukan loading page dan setelah pengguna melakukan submit dalam form register. 

### Chain of Responsibilities
COR dilakukan pada operasi Authentication, khususnya ketika pengguna melakukan registrasi. Ketika pengguna melakukan submit form register, data harus pertama kali melalui fungsi validator, yang akan melakukan pengecekan terhadap seluruh data yang dimasukkan. Data akan dilanjutkan kepada fungsi yang memasukkan akun pengguna ke dalam database dan terakhir setelah data pengguna berhasil dimasukkan maka akan dilanjutkan kepada fungsi login yang dapat mengarahkan pengguna ke homepage. 

### Proxy
Design pattern ini memungkinkan pengguna untuk melakukan operasi sebelum berinteraksi secara langsung kepada database. Proxy diterapkan kepada controller, contohnya controller purchase yang akan memastikan bahwa data yang dimasukkan oleh pengguna valid sebelum berinteraksi dengan database. 

## Technology Stack
1. Framework Laravel v10.15.0
2. PHP v8.2.8
3. mysql  Ver 8.0.30 for Win64 on x86_64 (MySQL Community Server - GPL)
4. npm v9.6.6
5. Composer version 2.5.8

## End Point
### GET login view (GET request)
- `http://127.0.0.1:8000/api/login`
- Response : Login View

### POST login (POST request)
- `http://127.0.0.1:8000/api/login`
- Request : email, password
- Redirects to home page if requested data is valid

### GET register view (GET request)
- `http://127.0.0.1:8000/api/register`
- Response : Register View

### POST register (POST request)
- `http://127.0.0.1:8000/api/register`
- Request : email, password, username
- Redirects to home page if requested data is valid

### GET home (GET request)
- `http://127.0.0.1:8000/api/home`
- Can only be accessed if the user is logged in
- Response : Home View

### GET detail (GET request)
- `http://127.0.0.1:8000/api/detail/{id}`
- Can only be accessed if the user is logged in
- id : id barang
- Response : Detail  View

### GET purchase (GET request)
- `http://127.0.0.1:8000/api/purchase/{id}`
- Can only be accessed if the user is logged in
- id : id barang
- Response : Purchase  View

### POST submitForm (POST request)
- `http://127.0.0.1:8000/form/submit/'`
- Can only be accessed if the user is logged in
- Request : id barang, jumlah pembelian

### GET success (GET request)
- `http://127.0.0.1:8000/api/success/{nama}/{total}/{jumlah}`
- Can only be accessed if the user is logged in
- Request : nama, total, jumlah barang yang dibeli
- Response : Success  View

### GET history (GET request)
- `http://127.0.0.1:8000/api/history`
- Can only be accessed if the user is logged in
- Response : History  View
## Bonus
### B06 Responsive Layout
Layout dari monolith akan menyesuaikan sesuai dengan ukuran layar

### B08 SOLID
#### Single Responsibility Principle : 
Setiap controller hanya bertanggung jawab untuk handle operasi yang ada di view yang memiliki nama yang sama dengannya. 

#### Dependency Inversion Principle : 
Kita tidak mendefinisikan database pada controller, tetapi menggunakan abstraksi yang memungkinkan kita untuk berinteraksi dengan database yang kita miliki. 
