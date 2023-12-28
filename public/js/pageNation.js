/**
 * 前提として、表示/非表示する要素は全てHTMLに記載
 * また、その要素のidに0から順に番号が振られていること（今回で言えば、id="content0",id="content1"等）
 * <?php $count=0;
 * foreach($array){
 *  echo "<div id='content".$count."'>$array[$count]</div>";
 *  $count++;
 * } ?>といった具合に。
 * <div id="pageNumber"></div>を任意の場所に記述。そこにページ番号のボタンが追加される。
 */


//1ページで表示する要素の数を定義、今回は1ページに5項目表示する
let itemNum = 5;
//表示/非表示する要素は全てに同じクラスを付与し、そのクラスの数を数える
let countContents = document.querySelectorAll('.plan_container').length;
//全ての要素の数を、1ページに表示する要素の数で割り、ページ数を割り出す
let countPage1 = Math.ceil(countContents / itemNum);
//ページ数を表示する親要素を定義する
let pageNumbers = document.getElementById('pageNumber');

//ページを別けるほど項目が多いとき、今回は読み込まれた項目が5項目より多いとき、
if (countContents > itemNum) {
    //1⃣.ページのリンクであることを強調するテキストを追加（ページネイト機能には関係なし）
    let ul = document.querySelector('.pagination');
    //一行に表示したいので、inline
    // pageTitle.style.display = 'inline-block';
    // pageTitle.textContent = 'Page> ';
    // pageNumbers.appendChild(pageTitle);

    //2⃣.1ページ目で表示する要素以外の、全ての要素を非表示
    // for (let i = itemNum; i < countContents; i++) {
        // 	document.getElementById('plan' + i).style.display = 'none';
    // }

    //3⃣.ページの数だけ、数字を表示
    for (let j = 1; j <= countPage1; j++) {
        let li = document.createElement('li');
        li.className = 'page-item';
        let a = document.createElement('a');
        a.className = 'page-link';
        a.href = '#';
        a.textContent = j;
        a.onclick = function() { pageNation(j); return false; };

        li.appendChild(a);
        ul.insertBefore(li, ul.children[ul.children.length - 1]); // 次のページリンクの前に挿入
    }
}

//pageNation関数
//ワンテンポ置きたい場合に(※追記)
let x;
function pageNation(pageNum) {
    x =setInterval(()=>{
    //表示する要素の最後の項目の番号を定義
    //1ページに５要素を表示するなら、1ページ目は0~4番目の要素であるから、4。
    //2ページ目は5~9番目の要素であるから、9。
    let contentEnd = pageNum * itemNum - 1;
    //一旦、全ての要素を非表示
    document.querySelectorAll('.plan_container').forEach((element) => {
        element.style.display = 'none';
});
    //要素の番号の大きい順に、再表示
    for (let k = contentEnd; k > contentEnd - itemNum; k--) {
        //1ページに表示する数に対して、全体の要素数が端数になるとき、足りない分の未定義になる部分のエラーを回避
        //例えば、5項目ずつ表示していて全体の要素が13のとき、14番目と15番目が未定義になりエラーを吐く。それを回避する。
        if (document.getElementById('plan' + k) != null) {
            document.getElementById('plan' + k).style.display = 'block';
        }
    }
    clearInterval(x);
    },300);
}