
# **Blog API - Laravel 10**  
A simple CRUD Blog API with user interactivity, built with Laravel 10.  

## **Features**  
- Blog CRUD (Create, Read, Update, Delete)  
- Post CRUD under a Blog  
- Like and Comment on Posts  
- Token-based Middleware Authentication  
- Database Seeding with a Default Viewer User  
- JSON Responses following RESTful principles  

---

## **Requirements**  
- PHP 8.1+  
- Composer  
- Laravel 10  
- MySQL (or MariaDB)  

---

## **Installation & Setup**  

### **1. Clone the Repository**  
```sh
git clone https://github.com/yourusername/blog-api.git
cd blog-api
```

### **2. Install Dependencies**  
```sh
composer install
```

### **3. Configure Environment**  
Rename `.env.example` to `.env`  
```sh
cp .env.example .env
```
Then update these values in the `.env` file:  
```
DB_CONNECTION=mysql  
DB_HOST=127.0.0.1  
DB_PORT=3306  
DB_DATABASE=your_database  
DB_USERNAME=your_username  
DB_PASSWORD=your_password  
```

### **4. Generate Application Key**  
```sh
php artisan key:generate
```

### **5. Run Migrations & Seed Database**  
```sh
php artisan migrate --seed
```
This will create the necessary tables and seed a **viewer** user

### **6. Start the Development Server**  
```sh
php artisan serve
```
The API will be available at `http://127.0.0.1:8000`  

---

## **API Endpoints**  

### **Blog Endpoints**  
| Method | Endpoint | Description |
|--------|---------|-------------|
| GET | `/api/blogs` | Get all blogs |
| POST | `/api/blogs` | Create a new blog |
| GET | `/api/blogs/{id}` | Get a single blog and its posts |
| PUT | `/api/blogs/{id}` | Update a blog |
| DELETE | `/api/blogs/{id}` | Delete a blog |

### **Post Endpoints**  
| Method | Endpoint | Description |
|--------|---------|-------------|
| GET | `/api/blogs/{blog}/posts` | Get all posts under a blog |
| POST | `/api/blogs/{blog}/posts` | Create a post under a blog |
| GET | `/api/posts/{id}` | Get a post with likes & comments |
| PUT | `/api/posts/{id}` | Update a post |
| DELETE | `/api/posts/{id}` | Delete a post |

### **Interaction Endpoints**  
| Method | Endpoint | Description |
|--------|---------|-------------|
| POST | `/api/posts/{post}/like` | Like a post |
| POST | `/api/posts/{post}/comment` | Comment on a post |

---

## **Authentication**  
All API requests must include a header:  
```
Authorization: vg@123
```
Any request without this token will be rejected.  

---

## **Testing with Postman**  
1. Import the provided **Postman collection** (included in the repository).  
2. Use the token `vg@123` in headers for authentication.  
3. Test different API endpoints.  

---

## **License**  
This project is open-source and free to use.  

---

### **Contributors**  
- **Ayowande Oluwatosin** - Backend Developer  

---
