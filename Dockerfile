FROM php:8.2-apache

# نسخ كل الملفات لمجلد الويب
COPY . /var/www/html/

# فتح البورت
EXPOSE 80
