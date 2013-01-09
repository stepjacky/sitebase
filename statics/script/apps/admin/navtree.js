[
    {
        name:'用户管理',
        isParent:true,
        href:'javascript:;',
        link:'',
        children:[

            {
                name:'用户列表',
                link:'user/listview',

            },
            {
                name:"登陆管理",
                link:"admin/backnd"
            }
        ]
    },{
    name:'文章管理',
    isParent:true,
    children:[
        {
            name:'文章分类',
            link:'artitlecategory/listview'
        },
        {
            name:'文章管理',
            link:'artitle/listview'
        },
        {
            name:"添加文章",
            link:"artitle/editnew/-1"
        }
    ]

},{
    name:'商家管理',
    isParent:true,
    children:[
        {
            name:'商家分类',
            link:'shopcategory/listview'

        },
        {
            name:'商家列表',
            link:'shop/listview'
        },
        {
            name:"添加商家",
            link:"shop/editnew"
        },
        {
            name:"图片管理",
            link:"picture/listview"
        },
        {
            name:'评论管理',
            link:'shopcommit/listview'
        }

    ]

},
    {
        name:'主页设置',
        link:'admin/subview/home',
        isParent:false
    },
    {
        name:'子页设置',
        link:'admin/subview/child'
    }


]