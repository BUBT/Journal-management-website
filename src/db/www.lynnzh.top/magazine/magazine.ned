
*
A3                !        )        0 �
admin�表名：admin
列值：【索引ID】、【用户名】、【密码】、【身份】
说明：后台工作人员表【Admin】
其中【身份】为tinyint类型：1 = 管理员，2 = 审校，3 = 编辑。默认值为3。InnoDB"utf8mb4*utf8mb4_general_ci2D
idint
0: B R Z b hp�Default�Default� � � � � � � 2l

admin_namechar0:'昵称'B HRutf8mb4Zutf8mb4_general_cib �Default�Default� � � � � � � 2a
	admin_pwdchar@0: B Rutf8mb4Zutf8mb4_general_cib �Default�Default� � � � � � � 2P
	admin_postinyint0:3B HR Z b h�Default�Default� � � � � � � :N
uk_admin "

admin_name  " ( 2 : B (���������2 :BTREE@ H R Z `j r x J
 adminid" (���������0 8 RmagazineX,`h� � � � � �Dynamic� � � � � � � � � � � � � � � � � ����������� � � � � ����������� � � � � � � �
paper�表名：paper
列值：【索引ID】、【标题】、【摘要】、【作者】、【发布时间】、【网页地址】、【纯文本内容】、【文章首图】、【收藏量】、【浏览量】
说明：文章基本表【Paper】InnoDB"utf8mb4*utf8mb4_general_ci2D
idint
0: B R Z b hp�Default�Default� � � � � � � 2n
paper_titlechar�0:'标题'B HRutf8mb4Zutf8mb4_general_cib �Default�Default� � � � � � � 2p
paper_summarychar�0:'摘要'B HRutf8mb4Zutf8mb4_general_cib �Default�Default� � � � � � � 2l
paper_authorchar0:'Lynn'B HRutf8mb4Zutf8mb4_general_cib �Default�Default� � � � � � � 2c
paper_contenttext: B HRutf8mb4Zutf8mb4_general_cib �Default�Default� � � � � � � 2b
paper_release	timestamp0:CURRENT_TIMESTAMPB HR Z b �Default�Default� � � � � � � 2|
	paper_urlchard0:'https://www.lynnzh.top/'B HRutf8mb4Zutf8mb4_general_cib �Default�Default� � � � � � � 2a
	paper_imgchard: B HRutf8mb4Zutf8mb4_general_cib �Default�Default� � � � � � � 2M

paper_starint
0:0B HR Z b h�Default�Default� � � � � � � 2M

paper_viewint
0:0B HR Z b h�Default�Default� � � � � � � :N
i_title  "
paper_title  " ( 2 : B (���������2 :BTREE@ H R Z `j r x :R
	i_summary  "
paper_summary  " ( 2 : B (���������2 :BTREE@ H R Z `j r x :M
	i_content "
paper_content  " ( 2 : B (���������2 : @ H R Z `j r x J
 paperid" (���������0 8 RmagazineX`h� � � � � �Dynamic� � � � � � � � � � � � � � � � � ����������� � � � � ����������� � � � � � � �
paper_topics表名：paper_topic
列值：【索引ID】、【文章ID】、【栏目ID】
说明：专题列表【Topic】
InnoDB"utf8*utf8_bin2D
idint
0: B R Z b hp�Default�Default� � � � � � � 2H
id_paperint
0: B R Z b h�Default�Default� � � � � � � 2I
id_tagint
0:1B HR Z b h�Default�Default� � � � � � � :d
uk_topic "
id_paper  " ( 2 : B "
id_tag  " ( 2 : B (���������2 :BTREE@ H R Z `j r x :K
	topic_tag  "
id_tag  " ( 2 : B (���������2 :BTREE@ H R Z `j r x J$
 paper_topicid" (���������0 8 RmagazineX`h� � � � � �Dynamic� � � � � � � � � � � � � � � � � ����������� � � � � ����������� � � � � � � �
tagW表名：tag
列值：【索引ID】、【标签值】
说明：栏目列表【Tag】InnoDB"utf8mb4*utf8mb4_general_ci2D
idint
0: B R Z b hp�Default�Default� � � � � � � 2e
tagchar-0:'杂谈'B HRutf8mb4Zutf8mb4_general_cib �Default�Default� � � � � � � 2q
meansvarchar�0:'栏目说明'B HRutf8mb4Zutf8mb4_general_cib �Default�Default� � � � � � � :D
i_tag  "
tag  " ( 2 : B (���������2 :BTREE@ H R Z `j r x :C
i_means "
means  " ( 2 : B (���������2 : @ H R Z `j r x J
 tagid" (���������0 8 RmagazineX
`h� � � � � �Dynamic� � � � � � � � � � � � � � � � � ����������� � � � � ����������� � � � � � � �
user�表名：user
列值：【索引ID】、【用户openID】、【用户昵称】、【用户头像所在地址】
说明：用户基本表【User】InnoDB"utf8mb4*utf8mb4_general_ci2D
idint
0: B R Z b hp�Default�Default� � � � � � � 2i
user_openIDchar(0:'WX'B HRutf8mb4Zutf8mb4_general_cib �Default�Default� � � � � � � 2k
	user_namechar0:'昵称'B HRutf8mb4Zutf8mb4_general_cib �Default�Default� � � � � � � 2�
user_avatarvarchar�0:V'https://www.google.com.hk/images/branding/googlelogo/2x/googlelogo_color_92x30dp.png'B HRutf8mb4Zutf8mb4_general_cib �Default�Default� � � � � � � J
 userid" (���������0 8 RmagazineX`h� � � � � �Dynamic� � � � � � � � � � � � � � � � � ����������� � � � � ����������� � � � � � � �
user_collectz表名：user_collect
列值：【索引ID】、【用户ID】、【文章ID】
说明：用户收藏列表【Collect】InnoDB"utf8*utf8_bin2D
idint
0: B R Z b hp�Default�Default� � � � � � � 2G
id_userint
0: B R Z b h�Default�Default� � � � � � � 2H
id_paperint
0: B R Z b h�Default�Default� � � � � � � :g

uk_collect "
id_user  " ( 2 : B "
id_paper  " ( 2 : B (���������2 :BTREE@ H R Z `j r x :Q
collect_paper  "
id_paper  " ( 2 : B (���������2 :BTREE@ H R Z `j r x J%
 user_collectid" (���������0 8 RmagazineX�`h� � � � � �Dynamic� � � � � � � � � � � � � � � � � ����������� � � � � ����������� � � � � � � �
user_subscribe~表名：user_subscribe
列值：【索引ID】、【用户ID】、【栏目ID】
说明：用户订阅列表【Subscribe】InnoDB"utf8*utf8_bin2D
idint
0: B R Z b hp�Default�Default� � � � � � � 2G
id_userint
0: B R Z b h�Default�Default� � � � � � � 2I
id_tagint
0:1B HR Z b h�Default�Default� � � � � � � :f
uk_subcribe "
id_user  " ( 2 : B "
id_tag  " ( 2 : B (���������2 :BTREE@ H R Z `j r x :I
sub_tag  "
id_tag  " ( 2 : B (���������2 :BTREE@ H R Z `j r x J'
 user_subscribeid" (���������0 8 RmagazineX�`h� � � � � �Dynamic� � � � � � � � � � � � � � � � � ����������� � � � � ����������� � � � � � � h
collect_paperuser_collectid_paper"paper*id08JmagazineRmagazineX` h rCASCADEzCASCADE� � e
collect_useruser_collectid_user"user*id08JmagazineRmagazineX` h rCASCADEzCASCADE� � `
sub_taguser_subscribeid_tag"tag*id08JmagazineRmagazineX` h rCASCADEzCASCADE� � c
sub_useruser_subscribeid_user"user*id08JmagazineRmagazineX` h rCASCADEzCASCADE� � e
topic_paperpaper_topicid_paper"paper*id08JmagazineRmagazineX` h rCASCADEzCASCADE� � _
	topic_tagpaper_topicid_tag"tag*id08JmagazineRmagazineX` h rCASCADEzCASCADE� � "�
	Diagram 1(0:F
D
admin� �(�2$	SSSSSS�?PPPPPP�?�?!      �?8 Bmagazine:G
E
paper�� �(�2$	SSSSSS�?PPPPPP�?�?!      �?8 Bmagazine:K
I
paper_topic(� �(n2$	SSSSSS�?PPPPPP�?�?!      �?8 Bmagazine:B
@
tag(< �(n2$	SSSSSS�?PPPPPP�?�?!      �?8 Bmagazine:E
C
user� �(�2$	SSSSSS�?PPPPPP�?�?!      �?8 Bmagazine:M
K
user_collect�� �(n2$	SSSSSS�?PPPPPP�?�?!      �?8 Bmagazine:N
L
user_subscribe�< �(n2$	SSSSSS�?PPPPPP�?�?!      �?8 Bmagazine: : : : : : J�
collect_paper����$	�������?�������?�������?!      �? *user_collect2id_paper:paperBidJmagazineRmagazineXbK��� *Arial Unicode MS0:$	�������?�������?�������?!      �?@ H P J�
collect_user����$	�������?�������?�������?!      �? *user_collect2id_user:userBidJmagazineRmagazineXbK��� *Arial Unicode MS0:$	�������?�������?�������?!      �?@ H P J�
sub_tag�n�n$	�������?�������?�������?!      �? *user_subscribe2id_tag:tagBidJmagazineRmagazineXbJ�f� *Arial Unicode MS0:$	�������?�������?�������?!      �?@ H P J�
sub_user�n�n$	�������?�������?�������?!      �? *user_subscribe2id_user:userBidJmagazineRmagazineXbJ�f� *Arial Unicode MS0:$	�������?�������?�������?!      �?@ H P J�
topic_paper����$	�������?�������?�������?!      �? *paper_topic2id_paper:paperBidJmagazineRmagazineXbK��� *Arial Unicode MS0:$	�������?�������?�������?!      �?@ H P J�
	topic_tagn�n�$	�������?�������?�������?!      �? *paper_topic2id_tag:tagBidJmagazineRmagazineXbJf�� *Arial Unicode MS0:$	�������?�������?�������?!      �?@ H P RArial Unicode MSX` h p �( 0:

magazine@hPX�N` h 