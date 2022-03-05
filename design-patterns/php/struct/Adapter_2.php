<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/3/15
 * Time: 19:27
 */

// 需求：获取文章列表，根据文章ID获取文章的标题
class Article
{
    public function getList()
    {
        echo '获取文章列表' . PHP_EOL;
    }

    public function getTitle($id)
    {
        echo '根据文章ID获取文章标题' . PHP_EOL;
    }
}

$obj = new Article();
$obj->getList();
$obj->getTitle(1);

// 需求变为：根据文章ID获取文章标题时还需要获取文章的创建时间，并需要更新文章的阅读次数。
// 方案一：修改article类的源代码增加这样的功能，但是如果getInfo()代码非常复杂，工作量将会很大。
// 方案二：使用适配器
class ArticleAdapter
{
    public $artObj;

    public function __construct($artObj)
    {
        $this->artObj = $artObj;
    }

    public function getTitle($id)
    {
        $this->artObj->getTitle($id);
    }

    public function getInfoAndUpdate($id)
    {
        //利用$this->_artObj查询符合要求的文章数据并更新浏览次数
        echo '$this->_artObj查询符合要求的文章数据并更新浏览次数' . PHP_EOL;
    }
}

$obj2 = new ArticleAdapter(new Article());
$obj2->getTitle(2);
$obj2->getInfoAndUpdate(3);
/*输出
获取文章列表
根据文章ID获取文章标题
根据文章ID获取文章标题
$this->_artObj查询符合要求的文章数据并更新浏览次数
 */