$(document).ready(function() {
    // spotContainerの中身をクリア
    $("#spotContainer").empty();

    // changeDays関数を実行
    changeDays();
});

// 日数に応じてフォームを追加・削除する関数
function changeDays() {
    const selectedDays = document.getElementById('date').value;
    const spotContainer = document.getElementById('spotContainer');
    let currentDays = 0;

    if (selectedDays === "日帰り") {
        currentDays = 1;
    } else if (selectedDays === "一泊二日") {
        currentDays = 2;
    } else if (selectedDays === "二泊三日") {
        currentDays = 3;
    } else if (selectedDays === "三泊四日") {
        currentDays = 4;
    } else if (selectedDays === "四泊五日") {
        currentDays = 5;
    } else if (selectedDays === "五泊六日") {
        currentDays = 6;
    } else if (selectedDays === "六泊以上") {
        currentDays = 7;
    }

    // 現在の日数より選択された日数が多い場合、新しいフォームを追加
    for (let i = spotContainer.childElementCount + 1; i <= currentDays; i++) {
        const newDayContainer = document.createElement('div');
        newDayContainer.className = 'dayContainer';
        newDayContainer.id = 'day' + i;

        const newLabel = document.createElement('label');
        newLabel.innerHTML = i + '日目';

        const newInput = document.createElement('input');
        newInput.type = 'text';
        newInput.className = 'spotInput';
        newInput.name = 'spot_day' + i + '[]';

        const newButton = document.createElement('button');
        newButton.type = 'button';
        newButton.className = 'addButton';
        newButton.innerHTML = '+';
        newButton.onclick = function() {
            addSpot('day' + i, 'arrow_day' + i);
        };

        const newArrow = document.createElement('span');
        newArrow.className = 'arrow';
        newArrow.id = 'arrow_day' + i;

        newDayContainer.appendChild(newLabel);
        newDayContainer.appendChild(newInput);
        newDayContainer.appendChild(newButton);
        newDayContainer.appendChild(newArrow);
        spotContainer.appendChild(newDayContainer);
    }

    // 現在の日数より選択された日数が少ない場合、不要なフォームを削除
    for (let i = spotContainer.childElementCount; i > currentDays; i--) {
        spotContainer.removeChild(spotContainer.lastChild);
    }
}

// 主なスポットの入力フォームを追加する関数
function addSpot(dayId, arrowId) {
    const dayContainer = document.getElementById(dayId);
    const newInput = document.createElement('input');
    const newButton = document.createElement('button');
    const newArrow = document.createElement('span');

    newInput.type = 'text';
    newInput.className = 'spotInput';
    newInput.name = 'spot_' + dayId + '[]';

    newButton.type = 'button';
    newButton.className = 'removeButton';
    newButton.innerHTML = '-';
    newButton.onclick = function() {
        this.previousSibling.remove();
        this.previousSibling.remove();
        this.parentNode.removeChild(this);
    };

    newArrow.className = 'arrow';
    newArrow.innerHTML = '→';

    dayContainer.appendChild(newInput);
    dayContainer.appendChild(newButton);
    dayContainer.appendChild(newArrow);

    // 最初の矢印を表示
    const firstArrow = document.getElementById(arrowId);
    if (firstArrow.innerHTML === '') {
        firstArrow.innerHTML = '→';
    }
}

// すべての日数の入力されていたすべての値を動的にフォームに表示
function removeSpot(button) {
    const input = button.previousElementSibling;
    const arrow = button.nextElementSibling;
    button.parentNode.removeChild(input);
    button.parentNode.removeChild(button);
    button.parentNode.removeChild(arrow);
}

// 画像のプレビュー表示
function previewImage(input) {
    const file = input.files[0];
    const reader = new FileReader();

    reader.onload = function(e) {
    const preview = document.getElementById('preview');
    preview.src = e.target.result;
    preview.style.display = 'block';
    sessionStorage.setItem('uploadedImage', e.target.result);
    }

    reader.readAsDataURL(file);
}