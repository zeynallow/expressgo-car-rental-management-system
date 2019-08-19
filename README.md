# ExpressGo - Car Rental Management System

## Requirements

*ExpressGO was built on Codeigniter 3.1.3 which requires:*

1. PHP >= 5.6 or newer
2. OpenSSL PHP Extension
3. MySQLi PHP Extension
4. Mbstring PHP Extension
5. Tokenizer PHP Extension

## Installer

**Step 1:** Transfer files to your server
Please extract archive and copy all files & folders to your web server "www" directory.
If you using Cpanel faster way is to upload zip on server via file manager and extract directly on server
Enter your Base URL in `/application/config/config.php`

`$config['base_url'] = 'http://localhost/';`

1. Open web server public url or /install
2. Hostname - Enter MySQL Hostname (Default: localhost)
2. Database Username - Enter MySQL Database Username
3. Database Password - Enter MySQL Database Password
4. Database Name - Enter MySQL Database Name (If not exists database, is created automatically
5. Click Install !

**Step 2:** Administrator Settings

1. Login - Not changed

`Login: Admin`

2. Password - Enter administrator password
>Note: Password and confirm password should be same

3. Confirm Password - Enter administrator Confirm Password 
4. Click Confirm !

>If you forget your password, you can view the MySQL admin table

**Step 3:** Setup ExpressGO

1.Company name - Enter your company name
2.Adress - Enter your address
3.Country - Enter your country
4.City - Enter your city
5.Langugae - Select your langugage
6.Phone - Enter your phone number
7.Tax - Enter your Tax percent. If there is no tax, enter 0
8.Click Confirm!

**Step 4:** Add Branch

1. Go to setup page
2. Enter Branch Name and click Add branch

> If you don't have a branch, enter "Head office". Because must be at least one branch

## Please read documentation

`documentation/index.html`
