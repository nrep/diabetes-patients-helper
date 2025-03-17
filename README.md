# Diabetes Management System (Doctor ) 

## Overview

The **Diabetes Management System** is a web and mobile application designed to bridge the gap between doctors and patients with diabetes by enabling real-time health monitoring and data sharing. The system collects and analyzes key health indicators such as blood sugar levels, HbA1C, weight, vital signs, and dietary habits recommended by doctors, ensuring accurate insights into a patient's progress and treatment effectiveness.


### **Tech Stack**

- **Backend**: Laravel Filament (for doctor's dashboard)
- **Mobile App**: React Native (for patient-side application)
- **Database**: MySQL
- **Authentication**: Laravel Sanctum

## Features

### **Doctor's Dashboard (Laravel Filament)**

- Manage patient records
- Track health indicators
- Assign dietary plans
- View historical health data
- Send notifications to patients

### **Patient Mobile App (React Native)**

- Log health indicators
- Receive treatment recommendations
- Track medication and dietary plans
- View notifications from doctors

---

## **API Documentation**

The following API endpoints allow interaction with the system

### **Headers**

Content-Type: application/x-www-form-urlencoded; charset=UTF-8

### **Notice**


### **Authentication**

#### **Register a New User**

```http
POST  /api/register
```

**Request Body:**

```json
{
  "name":"",
  "address" :"",
  "email":"",
  "phone":"",
  "age" :"",
  "gender" :"",
  "username":"",
  "password":""
}
```

**Response:**

```json
{
  "message": "User authenticated",
  "token": "generated_token",

}
```

#### **Login**

```http
POST  /api/login

```

**Request Body:**

```json
{
  "email": "",
  "password": ""

}
```

**Response:**

```json
{
  "message": "User authenticated",
  "token": "generated_token",
  "user" : "User information",
  "userid": "Logged in user id",
}
```

---

### **Patient Management**

#### **Get All Patients**

```http
GET  /api/patients
```

**Response:**

```json
[
  {
    "id": 1,
    "name": "",
    "email": "",
    "age": "",
    "gender": "",
    "address": "",
    "phone" : "",
    "username" : ""
  }
]
```

#### **Get a Single Patient**

```http
GET /api/patient/{id}
```
```json
[
  {
    "id": 1,
    "name": "",
    "email": "",
    "age": "",
    "gender": "",
    "address": "",
    "phone" : "",
    "username" : ""
  }
]
---
```
#### **Disease Management**

#### **Get All Diseases**

```http
GET /api/diseases
```

**Response:**

```json
[
  {
    "id": 1,
    "name": "",
    "symptoms" : "",
    "description": ""
  }
]
```

#### **Assign Disease to Patient**

```http
POST /api/savepatientdisease
```

**Request Body:**

```json
{
  "disease_id": "",
  "patient_id": "",  
  "diagnosed_at": "",
  "notes": " "
}
```

**Response:**

```json
{
  "message": "Disease assigned to patient successfully"
}
```
#### **Dietary plans Management**

#### **Get patient's Dietary Plan**

```http
GET /api/getdietaryplan
```
**Request Body:**

```json
{
  "patient_id": "",
  

}
```

**Response:**

```json
[
  {
    "plan": 1,
    "start_date": "",
    "end_date" : "",
    "description": ""
  }
]
---
```

### **Health Indicators**

#### **Save Health Indicators**

```http
POST /api/savehealthindicator
```

**Request Body:**

```json
{
  "patient_id": "",
  "hba1c": "",
  "weight": "",
  "blood_sugar": "",
 "oxygen" : "",
 "tension" : "",
 "description": "",
  "dates": ""
}
```

**Response:**

```json
{
  "message": "Health indicators recorded successfully"
}
```

#### **Get Patient's Health Indicators**

```http
GET /api/gethealthindicator
```

---

### **Notifications**

#### **Send Notification to Patient**

```http
GET /api/getnotifications
```

**Request Body:**

```json
{
  "patient_id": "",
  
}
```

**Response:**

```json
{
  "notifications": ""
}
```



## Installation & Setup

1. Clone the repository

2. Install dependencies:
   ```sh
   composer install
   ```
3. Set up the environment:
   ```sh
   cp .env.example .env
   php artisan key:generate
   ```
4. Configure the database in `.env` and run migrations:
   ```sh
   php artisan migrate --seed
   ```
5. Start the server:
   ```sh
   php artisan serve
   ```


   ```



### Need help?

Feel free to reach out for any inquiries or contributions! x

🚀 Happy Coding!

