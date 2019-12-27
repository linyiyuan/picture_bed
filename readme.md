# Picture_bed

- v1.0 林益远 2019.12.24 创建

## 1 前言
### 1.1 项目说明
该项目是使用了Laravel5.6 + bootstrap4.0开发的一个相册系统，其中图像资源存储于阿里云对象储存中，本项目的初衷是为了更方便的管理自己经常使用的一些照片，利用该系统能够将照片上传至阿里云上，方便我们更好的管理自己的照片

### 1.2 注意事项
该系统只是相册前端展示系统，不包含后台系统， 后台系统由[Vue-admin-template](https://github.com/linyiyuan/vue-admin-template) + [Laravel-admin-template](https://github.com/linyiyuan/laravel-admin-template) 的图传模块控制，
你可以根据自己选择，自己编写后台系统  前端页面均由[qqphp-com](https://github.com/qqphp-com) 所提供，在此特别感谢

该系统的照片是全开放状态，不带有任何保密效果，请勿上传私密以及带有隐私的照片

## 2 如何部署
### 2.1 开发说明
- 开发框架：`Laravel 5.6` `BootStap4.0` 
- PHP版本：`PHP 7.3` 

### 2.2 安装
#### 2.2.1 基本要求
- 服务器要求：
	- PHP >= 7.1.3
	- OpenSSL PHP扩展
	- PDO PHP扩展，注意需要php_mysql
	- Mbstring PHP扩展
	- Tokenizer PHP扩展
	- XML PHP扩展
<br>

#### 2.2.2 安装步骤
以下为本项目git仓库地址

	https://github.com/linyiyuan/picture_bed.git
	
<br>
**第1步：克隆代码**

	git clone https://github.com/linyiyuan/picture_bed.git
<br>
**第2步：安装composer包**
	
	composer install
	
<br>
**第3步：配置文件**

1、在项目中找到`.env.example`文件，该文件作为项目的全局配置文件，在部署时需要复制成`.env`，执行以下命令

	cp -f .env.example ./.env
2、根据.env文件修改各配置项，如果.env文件中没有存在key值则运行命令：

	  php artisan key:generate

3、配置stroage bootstrap 可写

	 chmod -R 777 stroage bootstrap
<br>

**第4步：初始化数据库**

在根路径上执行以下命令来实现初始化数据库结构。注意执行该命令前请检查项目是否已依赖`doctrine/dbal`

	php artisan migrate

运行数据迁移，初始化数据，生成默认用户以及相关角色权限

	 php artisan db:seed

至此基本以完成，可以在浏览器中访问域名即可，

<br>

## 项目展示

![相册首页](https://shmily-album.oss-cn-shenzhen.aliyuncs.com/photo_album_9/06e45d780c22b1818f38f35ffe1b9d10.jpg)

![相册列表](https://shmily-album.oss-cn-shenzhen.aliyuncs.com/photo_album_9/f897b405e0b1955aa58f5bd3ef9be31e.png.png)

![图片列表页](https://shmily-album.oss-cn-shenzhen.aliyuncs.com/photo_album_9/c37a55e8586dbc059550f6960c7f009a.jpg)

![图片列表页](https://shmily-album.oss-cn-shenzhen.aliyuncs.com/photo_album_9/81ca6c9a2f40659b1e650f47530670fe.jpg)

![图片详情页](https://shmily-album.oss-cn-shenzhen.aliyuncs.com/photo_album_9/1f8cb5ba592b3a230fc4e5801775bcc7.jpg)

![个人信息页](https://shmily-album.oss-cn-shenzhen.aliyuncs.com/photo_album_9/dfae36e2bea944e7d6a8a21ae84f8f7a.png.png)

