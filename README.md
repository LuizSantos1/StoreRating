# Rating
Rating Store by Customer - Magento 1


```
$ cd /path/to/module
$ git clone https://github.com/MageGoat/Rating.git
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
modman deploy --copy Rating
```

![Mage Goat](https://github.com/MageGoat/Rating/blob/master/goat.gif)