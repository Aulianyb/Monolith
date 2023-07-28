# Fullstack Monolith
Nama : Aulia Nadhirah Yasmin Badrulkamal <br />
NIM : 18221066 <br />

## Cara Menjalankan 

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
