
*
A3                !        )        0 �
articleArticle-文章表InnoDB"utf8*utf8_general_ci2S
aidint
0: B表 article IDR Z b hp�Default�Default� � � � � � � 2�
titlevarchar�0: B%文章-标题：默认为空字符串HRutf8Zutf8_general_cib �Default�Default� � � � � � � 2�
authorvarchar�0: B%文章-作者：默认为空字符串HRutf8Zutf8_general_cib �Default�Default� � � � � � � 2�
abstractvarchar�0: B%文章-摘要：默认为空字符串HRutf8Zutf8_general_cib �Default�Default� � � � � � � 2�
keywordsvarchar�0: B@文章-关键词组，使用逗号分开：默认为空字符串HRutf8Zutf8_general_cib �Default�Default� � � � � � � 2�
contenttinytext0: B.文章-纯文本内容：默认为空字符串Rutf8Zutf8_general_cib �Default�Default� � � � � � � 2�
	first_imgvarchar�0: B4文章-首图缩略图地址：默认为空字符串HRutf8Zutf8_general_cib �Default�Default� � � � � � � 2�
file_urlvarchar�0: B5文章-HTML文件所在地址：默认为空字符串HRutf8Zutf8_general_cib �Default�Default� � � � � � � 2�
recevied_datedatetime0:CURRENT_TIMESTAMPB+文章-收稿日期：默认为创建时间HR Z b �Default�Default� � � � � � � 2�
is_issuetinyint0:0BZ文章-发布标识：如果为0，表示在存稿箱，如果为1，表示已经发布。HR Z b h�Default�Default� � � � � � � 2�
viewint�0:0B<文章-浏览量：默认为0，用户每点击一次增加1HR Z b h�Default�Default� � � � � � � 2�
starint�0:0BR文章-收藏量：默认为0，用户每收藏一次增加1，取消收藏则减1HR Z b h�Default�Default� � � � � � � :i
i_article_author索引-文章表-作者 "
author  " ( 2 : B (���������2 :BTREE@ H R Z `j r x :b
i_article_title索引-文章表-标题"
title  " ( 2 : B (���������2 : @ H R Z `j r x :h
i_article_abstract索引-文章表-摘要"
abstract  " ( 2 : B (���������2 : @ H R Z `j r x :e
i_article_kw索引-文章表-关键词"
keywords  " ( 2 : B (���������2 : @ H R Z `j r x :i
i_article_content索引-文章表-纯文本"
content  " ( 2 : B (���������2 : @ H R Z `j r x J!
 articleaid" (���������0 8 RjournalX"`h� � � � � �Dynamic� � � � � � � � � � � � � � � � � ����������� � � � � ����������� � � � � � � �
tagsTags-栏目列表InnoDB"utf8*utf8_general_ci2P
tidint
0: B表 Tags IDR Z b hp�Default�Default� � � � � � � 2�
tagvarchar�0: B.栏目列表-栏目名：默认为空字符串HRutf8Zutf8_general_cib �Default�Default� � � � � � � :U
i_tags_unique	?????????"
tag  " ( 2 : B (���������2 :BTREE@ H R Z `j r x :O

i_tags_tag??-????-???"
tag  " ( 2 : B (���������2 : @ H R Z `j r x J
 tagstid" (���������0 8 RjournalX `h� � � � � �Dynamic� � � � � � � � � � � � � � � � � ����������� � � � � ����������� � � � � � � �
columnColumn-栏目详情表InnoDB"utf8*utf8_bin2R
cidint
0: B表 Column IDR Z b hp�Default�Default� � � � � � � 2[
tidint
0: B栏目详情表-栏目IDR Z b h�Default�Default� � � � � � � 2[
aidint
0: B栏目详情表-文章IDR Z b h�Default�Default� � � � � � � :L
fk_column_aid  "
tid  " ( 2 : B (���������2 :BTREE@ H R Z `j r x J 
 columncid" (���������0 8 RjournalX `h� � � � � �Dynamic� � � � � � � � � � � � � � � � � ����������� � � � � ����������� � � � � � � �
userUser-用户表InnoDB"utf8mb4*utf8mb4_0900_ai_ci2P
uidint
0: B表 user IDR Z b hp�Default�Default� � � � � � � 2�
openidvarchar@0: B用户-小程序唯一标识符HRutf8mb4Zutf8mb4_0900_ai_cib �Default�Default� � � � � � � 2r
namevarchar�0: B用户-用户名HRutf8mb4Zutf8mb4_0900_ai_cib �Default�Default� � � � � � � 2w
avatarvarchar�0: B用户-头像地址HRutf8mb4Zutf8mb4_0900_ai_cib �Default�Default� � � � � � � J
 useruid" (���������0 8 RjournalX `h� � � � � �Dynamic� � � � � � � � � � � � � � � � � ����������� � � � � ����������� � � � � � � �
favoriteFavorite-用户喜欢表InnoDB"utf8*utf8_bin2T
fidint
0: B表 favorite IDR Z b hp�Default�Default� � � � � � � 2[
uidint
0: B用户喜欢表-用户IDR Z b h�Default�Default� � � � � � � 2[
aidint
0: B用户喜欢表-文章IDR Z b h�Default�Default� � � � � � � :N
fk_favorite_uid  "
uid  " ( 2 : B (���������2 :BTREE@ H R Z `j r x :N
fk_favorite_aid  "
aid  " ( 2 : B (���������2 :BTREE@ H R Z `j r x J"
 favoritefid" (���������0 8 RjournalX `h� � � � � �Dynamic� � � � � � � � � � � � � � � � � ����������� � � � � ����������� � � � � � � �
	subscribeSubscribe-用户订阅表InnoDB"utf8*utf8_bin2U
sidint0: B表 Subscribe IDR Z b hp�Default�Default� � � � � � � 2[
uidint
0: B用户订阅表-用户IDR Z b h�Default�Default� � � � � � � 2[
tidint
0: B用户订阅表-栏目IDR Z b h�Default�Default� � � � � � � :O
fk_subscribe_uid  "
uid  " ( 2 : B (���������2 :BTREE@ H R Z `j r x :O
fk_subscribe_tid  "
tid  " ( 2 : B (���������2 :BTREE@ H R Z `j r x J#
 	subscribesid" (���������0 8 RjournalX `h� � � � � �Dynamic� � � � � � � � � � � � � � � � � ����������� � � � � ����������� � � � � � � �
comment InnoDB"utf8mb4*utf8mb4_0900_ai_ci2Q
idint
0: BComment表 IDR Z b hp�Default�Default� � � � � � � 2C
aidint
0: B R Z b h�Default�Default� � � � � � � 2C
uidint
0: B R Z b h�Default�Default� � � � � � � 2e
commentvarchar�0: B HRutf8mb4Zutf8mb4_0900_ai_cib �Default�Default� � � � � � � :Q
fk_comment_article  "
aid  " ( 2 : B (���������2 :BTREE@ H R Z `j r x :M
fk_comment_uid  "
uid  " ( 2 : B (���������2 :BTREE@ H R Z `j r x J 
 commentid" (���������0 8 RjournalX `h� � � � � �Dynamic� � � � � � � � � � � � � � � � � ����������� � � � � ����������� � � � � � � b
fk_favorite_aidfavoriteaid"article*aid08JjournalRjournalX` h rCASCADEzCASCADE� � _
fk_favorite_uidfavoriteuid"user*uid08JjournalRjournalX` h rCASCADEzCASCADE� � a
fk_subscribe_tid	subscribetid"tags*tid08JjournalRjournalX` h rCASCADEzCASCADE� � a
fk_subscribe_uid	subscribeuid"user*uid08JjournalRjournalX` h rCASCADEzCASCADE� � e
fk_comment_articlecommentaid"article*aid08JjournalRjournalX` h rCASCADEzRESTRICT� � _
fk_comment_uidcommentuid"user*uid08JjournalRjournalX` h rRESTRICTzRESTRICT� � b
fk_column_articlecolumnaid"article*aid08JjournalRjournalX` h rCASCADEzCASCADE� � \
fk_column_tagscolumntid"tags*tid08JjournalRjournalX` h rCASCADEzCASCADE� � "�
	Diagram 1(0:H
F
article�� �(�2$	SSSSSS�?PPPPPP�?�?!      �?8 Bjournal:D
B
tags�� �(Z2$	SSSSSS�?PPPPPP�?�?!      �?8 Bjournal:F
D
column�� �(n2$	SSSSSS�?PPPPPP�?�?!      �?8 Bjournal:D
B
user� �(�2$	SSSSSS�?PPPPPP�?�?!      �?8 Bjournal:G
E
favorite�  �(n2$	SSSSSS�?PPPPPP�?�?!      �?8 Bjournal:H
F
	subscribe�  �(n2$	SSSSSS�?PPPPPP�?�?!      �?8 Bjournal: : : : :F
D
comment   �(�2$	SSSSSS�?PPPPPP�?�?!      �?8 Bjournal: : : : J�
fk_favorite_aid�}��$	�������?�������?�������?!      �? *favorite2aid:articleBaidJjournalRjournalXbJ�i� *Arial Unicode MS0:$	�������?�������?�������?!      �?@ H P J�
fk_favorite_uid�}[�$	�������?�������?�������?!      �? *favorite2uid:userBuidJjournalRjournalXbI�i} *Arial Unicode MS0:$	�������?�������?�������?!      �?@ H P J�
fk_subscribe_tid�7��$	�������?�������?�������?!      �? *	subscribe2tid:tagsBtidJjournalRjournalXbJ�/� *Arial Unicode MS0:$	�������?�������?�������?!      �?@ H P J�
fk_subscribe_uid�}e�$	�������?�������?�������?!      �? *	subscribe2uid:userBuidJjournalRjournalXbJ�i� *Arial Unicode MS0:$	�������?�������?�������?!      �?@ H P J�
fk_comment_article�A��$	�������?�������?�������?!      �? *comment2aid:articleBaidJjournalRjournalXbJ�9� *Arial Unicode MS0:$	�������?�������?�������?!      �?@ H P J�
fk_comment_uidK�o�$	�������?�������?�������?!      �? *comment2uid:userBuidJjournalRjournalXbIC}� *Arial Unicode MS0:$	�������?�������?�������?!      �?@ H P J�
fk_column_article����$	�������?�������?�������?!      �? *column2aid:articleBaidJjournalRjournalXbK��� *Arial Unicode MS0:$	�������?�������?�������?!      �?@ H P J�
fk_column_tags����$	�������?�������?�������?!      �? *column2tid:tagsBtidJjournalRjournalXbJ��} *Arial Unicode MS0:$	�������?�������?�������?!      �?@ H P RArial Unicode MSX` h p �( 0:	
journal@hPX�N` h 