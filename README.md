# Diabetes Management System (Doctor & Patient)

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

### **Authentication**

#### **Register a New User**

```http
POST /api/register
```

**Request Body:**

```json
{
  "name": "John Doe",
  "email": "johndoe@example.com",
  "password": "password123",
  "role": "patient"
}
```

**Response:**

```json
{
  "message": "User registered successfully",
  "token": "generated_token"
}
```

#### **Login**

```http
POST /api/login
```

**Request Body:**

```json
{
  "email": "johndoe@example.com",
  "password": "password123"
}
```

**Response:**

```json
{
  "message": "Login successful",
  "token": "generated_token"
}
```

---

### **Patient Management**

#### **Get All Patients**

```http
GET /api/patients
```

**Response:**

```json
[
  {
    "id": 1,
    "name": "John Doe",
    "email": "johndoe@example.com",
    "age": 45,
    "gender": "male"
  }
]
```

#### **Get a Single Patient**

```http
GET /api/patients/{id}
```

---

### **Disease Management**

#### **Get All Diseases**

```http
GET /api/diseases
```

**Response:**

```json
[
  {
    "id": 1,
    "name": "Diabetes",
    "description": "A chronic condition affecting blood sugar levels."
  }
]
```

#### **Assign Disease to Patient**

```http
POST /api/patients/{id}/diseases
```

**Request Body:**

```json
{
  "disease_id": 1,
  "diagnosed_at": "2025-03-08"
}
```

**Response:**

```json
{
  "message": "Disease assigned to patient successfully"
}
```

---

### **Health Indicators**

#### **Submit Health Indicators**

```http
POST /api/patients/{id}/health-indicators
```

**Request Body:**

```json
{
  "blood_sugar": 120,
  "hba1c": 6.5,
  "weight": 75,
  "vital_signs": {
    "heart_rate": 72,
    "blood_pressure": "120/80"
  },
  "date": "2025-03-08"
}
```

**Response:**

```json
{
  "message": "Health indicators recorded successfully"
}
```

#### **Get Patient's Health Records**

```http
GET /api/patients/{id}/health-indicators
```

---

### **Notifications**

#### **Send Notification to Patient**

```http
POST /api/notifications
```

**Request Body:**

```json
{
  "user_id": 1,
  "title": "Check-up Reminder",
  "message": "Please schedule your next check-up."
}
```

**Response:**

```json
{
  "message": "Notification sent successfully"
}
```

#### **Get Patient Notifications**

```http
GET /api/patients/{id}/notifications
```

---

## Installation & Setup

### **Backend (Laravel Filament)**

1. Clone the repository:
   ```sh
   git clone https://github.com/your-repo/diabetes-management.git
   cd diabetes-management
   ```
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

### **Mobile App (React Native)**

1. Navigate to the mobile folder:
   ```sh
   cd mobile-app
   ```
2. Install dependencies:
   ```sh
   npm install
   ```
3. Run the application:
   ```sh
   npm start
   ```

## License

This project is licensed under the MIT License.

---

### Need help?

Feel free to reach out for any inquiries or contributions!

🚀 Happy Coding!

