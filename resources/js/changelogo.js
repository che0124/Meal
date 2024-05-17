// changelogo.js

// 定义函数来改变Logo图片
function changelogo() {
    // 获取要更改图像的元素
    var createlightLogo = document.getElementById('createlightLogo');
    // 在这里执行你想要的图像改变操作，例如修改其 src 属性
    createlightLogo.src = "http://localhost:8080/Meal/public/images/plus%20%E6%B7%B1.svg"; // 替换为你想要显示的新图像的URL
}

// 定义函数来处理点击事件
function handleClick() {
    // 获取点击的元素
    var clickedElement = event.target;
    
    // 检查点击的元素是否是 Logo 图片或文字
    if (clickedElement.id === 'createlightLogo' || clickedElement.id === 'createWord') {
        // 如果是 Logo 图片或文字，执行图像改变操作
        changelogo();
    }
}

// 为整个页面添加点击事件监听器，以处理点击事件
document.addEventListener('click', handleClick);
