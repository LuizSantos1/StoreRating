# Store Rating
Rating Store by Customer - Magento 1


```
$ cd /path/to/module
$ git clone https://github.com/MageGoat/StoreRating.git
```


```
$ cd path/to/magento
$ modman link Rating </path/to/module>
```


magento aceita link simbolico, alterarando no app/etc/config.xml.
```
 <dev>
    <template>
        <allow_symlink>1</allow_symlink>
    </template>
</dev>
```


de link simbolico para copia.
```
modman deploy --copy StoreRating
```


#@TABLES

tabela storerating_brief
	
	rating_id
	customer_id *
	stars
	title
	text
	dog_name 
	photo_path
	status
	create-at 
	update_at

DROP TABLE `storerating_rating`;
DELETE FROM `core_resource` WHERE `core_resource`.`code` = 'storerating_setup';

![Mage Goat](https://github.com/MageGoat/StoreRating/blob/master/goat.gif)