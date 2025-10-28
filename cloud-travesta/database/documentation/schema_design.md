# Database Schema Design - Travesta

## Application Requirements
Aplikasi yang akan dibangun adalah sistem manajemen konten destinasi wisata dengan fitur:
- User authentication 
- Manajemen posts destinasi dengan kategori
- Media file management untuk images

## Entity Relationship Design

### 1. Users Table
- Primary entity untuk authentication
- Menyimpan informasi dasar user
- Relationship: One-to-Many dengan Posts

### 2. Categories Table  
- Kategorisasi utama untuk posts
- Hierarchical structure dengan parent_id
- Relationship: One-to-Many dengan Posts

### 3. Posts Table
- Content utama aplikasi
- Memiliki status publication (draft, published, archived)
- Relationship: Many-to-One dengan Users, Categories

### 4. Media Table
- File storage management
- Support multiple file types (images)
- Relationship: Many-to-One dengan Posts

## Database Constraints
- Foreign key constraints untuk referential integrity
- Unique constraints untuk email, slug
- Index untuk performance optimization
- Soft deletes untuk data preservation