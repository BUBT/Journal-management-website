
*
A3                !        )        0 �
article InnoDB"utf8*utf8_bin2R
aidint
0: BArticle 表IDR Z b hp�Default�Default� � � � � � � J!
 articleaid" (���������0 8 RpublishX `h� � � � � �Dynamic� � � � � � � � � � � � � � � � � ����������� � � � � ����������� � � � � � � �
label InnoDB"utf8*utf8_bin2Q
lidint
0: BLabel 表 IDR Z b hp�Default�Default� � � � � � � 2e
labelvarchar�0: B标签值 labelHRutf8Zutf8_binb �Default�Default� � � � � � � J
 labellid" (���������0 8 RpublishX `h� � � � � �Dynamic� � � � � � � � � � � � � � � � � ����������� � � � � ����������� � � � � � � �
user InnoDB"utf8*utf8_bin2P
uidint
0: BUser 表 IDR Z b hp�Default�Default� � � � � � � J
 useruid" (���������0 8 RpublishX `h� � � � � �Dynamic� � � � � � � � � � � � � � � � � ����������� � � � � ����������� � � � � � � �
favorite InnoDB"utf8*utf8_bin2T
fidint
0: BFavorite 表 IDR Z b hp�Default�Default� � � � � � � 2N
uidint
0: BUser 表 IDR Z b h�Default�Default� � � � � � � 2Q
aidint
0: BArticle 表 IDR Z b h�Default�Default� � � � � � � J"
 favoritefid" (���������0 8 RpublishX `h� � � � � �Dynamic� � � � � � � � � � � � � � � � � ����������� � � � � ����������� � � � � � � �
topic InnoDB"utf8*utf8_bin2M
tidint0: BTopic 表 IDR Z b �Default�Default� � � � � � � 2O
lidint
0: BLabel 表 IDR Z b h�Default�Default� � � � � � � 2Q
aidint
0: BArticle 表 IDR Z b h�Default�Default� � � � � � � J
 topictid" (���������0 8 RpublishX `h� � � � � �Dynamic� � � � � � � � � � � � � � � � � ����������� � � � � ����������� � � � � � � �
	subscribe InnoDB"utf8*utf8_bin2U
sidint
0: BSubscribe 表 IDR Z b hp�Default�Default� � � � � � � 2N
uidint
0: BUser 表 IDR Z b h�Default�Default� � � � � � � 2O
lidint
0: BLabel 表 IDR Z b h�Default�Default� � � � � � � J#
 	subscribesid" (���������0 8 RpublishX `h� � � � � �Dynamic� � � � � � � � � � � � � � � � � ����������� � � � � ����������� � � � � � � �
comment InnoDB"utf8mb4*utf8mb4_0900_ai_ci2S
cidint
0: BComment 表 IDR Z b hp�Default�Default� � � � � � � 2Q
aidint
0: BArticle 表 IDR Z b h�Default�Default� � � � � � � 2N
uidint
0: BUser 表 IDR Z b h�Default�Default� � � � � � � 2q
commentvarchar�0: B评论内容HRutf8mb4Zutf8mb4_0900_ai_cib �Default�Default� � � � � � � J!
 commentcid" (���������0 8 RpublishX `h� � � � � �Dynamic� � � � � � � � � � � � � � � � � ����������� � � � � ����������� � � � � � � d
fk_comment_articlecommentaid"article*aid08JpublishRpublishX` h rCASCADEzCASCADE� � `
fk_comment_usercommentuid"user*uid08JpublishRpublishX` h rRESTRICTzRESTRICT� � f
fk_favorite_articlefavoriteaid"article*aid08JpublishRpublishX` h rCASCADEzCASCADE� � `
fk_favorite_userfavoriteuid"user*uid08JpublishRpublishX` h rCASCADEzCASCADE� � d
fk_subscribe_label	subscribelid"label*lid08JpublishRpublishX` h rCASCADEzCASCADE� � b
fk_subscribe_user	subscribeuid"user*uid08JpublishRpublishX` h rCASCADEzCASCADE� � `
fk_topic_articletopicaid"article*aid08JpublishRpublishX` h rCASCADEzCASCADE� � \
fk_topic_labeltopiclid"label*lid08JpublishRpublishX` h rCASCADEzCASCADE� � "�
	Diagram 1(0:F
D
articles� �(P2$	�������?�������?      �?!     �o@8 Bpublish:D
B
label�  �(P2$	�������?�������?      �?!     �o@8 Bpublish:D
B
user�� �(P2$	�������?�������?      �?!     �o@8 Bpublish:H
F
favorite�� �(z2$	SSSSSS�?PPPPPP�?�?!      �?8 Bpublish:C
A
topicg  �(n2$	SSSSSS�?PPPPPP�?�?!      �?8 Bpublish:I
G
	subscribe� �(�2$	SSSSSS�?PPPPPP�?�?!      �?8 Bpublish:H
F
comment�� �(�2$	SSSSSS�?PPPPPP�?�?!      �?8 Bpublish: : : : : : : : J�
fk_comment_article����$	�������?�������?�������?!      �? *comment2aid:articleBaidJpublishRpublishXbK��� *Arial Unicode MS0:$	�������?�������?�������?!      �?@ H P J�
fk_comment_user����$	�������?�������?�������?!      �? *comment2uid:userBuidJpublishRpublishXbK��� *Arial Unicode MS0:$	�������?�������?�������?!      �?@ H P J�
fk_favorite_article����$	�������?�������?�������?!      �? *favorite2aid:articleBaidJpublishRpublishXbK��� *Arial Unicode MS0:$	�������?�������?�������?!      �?@ H P J�
fk_favorite_user����$	�������?�������?�������?!      �? *favorite2uid:userBuidJpublishRpublishXbJ��} *Arial Unicode MS0:$	�������?�������?�������?!      �?@ H P J�
fk_subscribe_label�	V�($	�������?�������?�������?!      �? *	subscribe2lid:labelBlidJpublishRpublishXbJ�N� *Arial Unicode MS0:$	�������?�������?�������?!      �?@ H P J�
fk_subscribe_user�	`��$	�������?�������?�������?!      �? *	subscribe2uid:userBuidJpublishRpublishXbJ�X� *Arial Unicode MS0:$	�������?�������?�������?!      �?@ H P J�
fk_topic_articleX7��$	�������?�������?�������?!      �? *topic2aid:articleBaidJpublishRpublishXbHX/y *Arial Unicode MS0:$	�������?�������?�������?!      �?@ H P J�
fk_topic_labelXA�_$	�������?�������?�������?!      �? *topic2lid:labelBlidJpublishRpublishXbHX9q *Arial Unicode MS0:$	�������?�������?�������?!      �?@ H P RArial Unicode MSX` h p �( 0:	
publish@hPX�N` h 