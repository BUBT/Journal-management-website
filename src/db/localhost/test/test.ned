
*
A3                !        )        0 �
article InnoDB"utf8*utf8_general_ci2O
aidint
0: B
article???R Z b hp�Default�Default� � � � � � � 2_
titlevarchar�0: B??HRutf8Zutf8_general_cib �Default�Default� � � � � � � 2`
authorvarchar�0: B??HRutf8Zutf8_general_cib �Default�Default� � � � � � � 2b
abstractvarchar�0: B??HRutf8Zutf8_general_cib �Default�Default� � � � � � � 2c
keywordsvarchar�0: B???HRutf8Zutf8_general_cib �Default�Default� � � � � � � 2c
contenttinytext0: Btext????Rutf8Zutf8_general_cib �Default�Default� � � � � � � 2c
	first_imgvarchar�0: B??HRutf8Zutf8_general_cib �Default�Default� � � � � � � 2h
file_urlvarchar�0: BHTML????HRutf8Zutf8_general_cib �Default�Default� � � � � � � 2e
recevied_datedatetime0:CURRENT_TIMESTAMPB????HR Z b �Default�Default� � � � � � � 2�
is_issuetinyint0:0BS发布标识：如果为0，表示在存稿箱，如果为1，表示已经发布。HR Z b h�Default�Default� � � � � � � :X
i_article_author?????? "
author  " ( 2 : B (���������2 :BTREE@ H R Z `j r x :S
i_article_title????????"
title  " ( 2 : B (���������2 : @ H R Z `j r x :W
i_article_abstract??????"
abstract  " ( 2 : B (���������2 : @ H R Z `j r x :P
i_article_kw?????"
keywords  " ( 2 : B (���������2 : @ H R Z `j r x :S
i_article_content????"
content  " ( 2 : B (���������2 : @ H R Z `j r x J!
 articleaid" (���������0 8 RtestX`h� � � � � �Dynamic� � � � � � � � � � � � � � � � � ����������� � � � � ����������� � � � � � � �
column InnoDB"utf8*utf8_bin2N
cidint
0: B	?????????R Z b hp�Default�Default� � � � � � � 2G
tidint
0: B??IDR Z b h�Default�Default� � � � � � � 2G
aidint
0: B??IDR Z b h�Default�Default� � � � � � � :S
fk_article_in_column  "
aid  " ( 2 : B (���������2 :BTREE@ H R Z `j r x :U
fk_tags_list_in_column  "
tid  " ( 2 : B (���������2 :BTREE@ H R Z `j r x J 
 columncid" (���������0 8 RtestX`h� � � � � �Dynamic� � � � � � � � � � � � � � � � � ����������� � � � � ����������� � � � � � � �
single_filed_varchar_label InnoDB"utf8*utf8_bin2D
idint0: B R Z b hp�Default�Default� � � � � � � 2T
labelvarchar�0: B Rutf8Zutf8_binb �Default�Default� � � � � � � J3
 single_filed_varchar_labelid" (���������0 8 RtestX`h� � � � � �Dynamic� � � � � � � � � � � � � � � � � ����������� � � � � ����������� � � � � � � �
	tags_list InnoDB"utf8*utf8_general_ci2O
tidint
0: B
??????????R Z b hp�Default�Default� � � � � � � 2b
tag_namevarchar�0: B????Rutf8Zutf8_general_cib �Default�Default� � � � � � � :Y
i_tags_list_tag_name??????"
tag_name  " ( 2 : B (���������2 : @ H R Z `j r x J#
 	tags_listtid" (���������0 8 RtestX `h� � � � � �Dynamic� � � � � � � � � � � � � � � � � ����������� � � � � ����������� � � � � � � _
fk_article_in_columncolumnaid"article*aid08JtestRtestX` h rCASCADEzCASCADE� � c
fk_tags_list_in_columncolumntid"	tags_list*tid08JtestRtestX` h rCASCADEzCASCADE� � "�
	Diagram 1(0:D
B
article�( �(�2$	SSSSSS�?PPPPPP�?�?!      �?8 Btest:B
@
column�P �(n2$	SSSSSS�?PPPPPP�?�?!      �?8 Btest:V
T
single_filed_varchar_label� �(Z2$	SSSSSS�?PPPPPP�?�?!      �?8 Btest:D
B
	tags_listZ �(Z2$	SSSSSS�?PPPPPP�?�?!      �?8 Btest: : J�
fk_article_in_column����$	�������?�������?�������?!      �? *column2aid:articleBaidJtestRtestXbK��� *Arial Unicode MS0:$	�������?�������?�������?!      �?@ H P J�
fk_tags_list_in_column����$	�������?�������?�������?!      �? *column2tid:	tags_listBtidJtestRtestXbK��� *Arial Unicode MS0:$	�������?�������?�������?!      �?@ H P RArial Unicode MSX` h p �( 0:
test@hPX�N` h 