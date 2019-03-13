# 服务器的一些配置说明

## 服务器设定

1. 服务器：[腾讯云服务器](https://console.cloud.tencent.com/cvm/index)
2. 主 IP 地址：[公网IP](134.175.123.134)
3. 远程连接账户名：`Administrator`
4. 远程连接密码：`JrFMjeyT5q5cI`
5. 到期时间：`2019-11-14`

## 域名信息
1. 域名服务商：[阿里云](https://dc.console.aliyun.com/next/index?spm=5176.2020520001.aliyun_sidebar.aliyun_sidebar_domain.61634bd3F36Mz5#/domain/list/all-domain)
2. 域名：[lynnzh.top](lynnzh.top)
3. 到期日期：`2023-03-31`

-----

## 数据库设定
1. 数据库类型：`MySQL`
2. 版本号：`8.0`
3. 配置过程：
```conf
# 1.命令行模式进入 mysql 解压后的文件夹，进入 bin 目录
# 2.初始化数据库，并输出临时密码(临时密码在输出信息中的：A temporary password is generated for root@localhost: 后面)
mysqld --initialize --console
# 3.安装 MySQL 服务
mysqld -install mysql
# 4.启动 MySQL 服务
net start mysql
# 5.进入数据库，回车后输入之前的临时密码
mysql -uroot -p
# 6.成功进入数据库后，修改密码
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'myNewPassword';

```

![MySQL配置图解](/src/desc/imgs/mysql-install.png)

4. 管理工具：[Navicat](https://www.navicat.com.cn/download/navicat-premium) [Navicat Patch](https://pan.baidu.com/s/1-wk6oO8METh2IhZpeUSpjg)
5. 连接数据：

| 主机 | 端口号 | 用户名 | 密码 |
| :-- | :-- | :-- | :-- |
| 134.175.123.134 | 3306 | root | mysql-lynnzh |
| localhost | 3306 | root | mysql |

![数据库连接示例](/src/desc/imgs/mysql-connection.png)


## PHP设定
1. 安装 `Composer`
2. `php.ini`配置
3. 测试

## Apache设定
1. 安装
2. `httpd.conf`配置

-----


