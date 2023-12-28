function editPlan(button, planId) {
    // プランのデータを取得して、編集可能なフォームに変更
    const planContent = button.closest('.plan_content');

    const title = planContent.querySelector('.plan_title').textContent;
    const date = planContent.querySelector('.plan_date strong').nextSibling.textContent.trim();
    const money = planContent.querySelector('.plan_money strong').nextSibling.textContent.trim();
    const traffic = planContent.querySelector('.plan_traffic strong').nextSibling.textContent.trim();
    const imageSrc = planContent.querySelector('.plan_image img').src;
    const spots = Array.from(planContent.querySelectorAll('.plan_spot strong')).map(function(elem) {
        return {
            day: elem.textContent,
            locations: elem.nextSibling.textContent.trim().split('→')
        };
    });
    const body = planContent.querySelector('.plan_body').textContent;

    // 編集前のコンテンツを保存
    planContent.dataset.originalContent = planContent.innerHTML;

    const formHtml = `
    <div class="edit_plan_container">
    <div class="edit_plan_content">
        <div class="plan_title">
            <input type="text" name="title" value="${title}">
        </div>
        <div class="plan_date">
            <strong>滞在日数</strong><input type="text" name="date" value="${date}">
        </div>
        <div class="plan_money">
            <strong>想定予算</strong><input type="text" name="money" value="${money}">
        </div>
        <div class="plan_traffic">
            <strong>主な移動手段</strong><input type="text" name="traffic" value="${traffic}">
        </div>
        <div class="plan_details">
            <div class="plan_image">
                <img src="${imageSrc}" alt="プラン画像">
            </div>

            <div class="plan_spot">
                ${spots.map((spot, index) => `
                    <div>
                        <strong>${spot.day}</strong>
                        <input type="text" name="spots[${index}]" value="${spot.locations.join('→')}">
                    </div>
                `).join('')}
            </div>
        </div>
        <div class="plan_body">
            <textarea name="body">${body}</textarea>
        </div>
        </div>
        <div class="buttons">
            <button class="save-button" onclick="savePlan(this, ${planId})">保存</button>
            <button class="cancel-button" onclick="cancelEdit(this)">キャンセル</button>
        </div>
    </div>
    </div>
    `;
    planContent.innerHTML = formHtml;
}

function cancelEdit(button) {
    var planContent = button.closest('.plan_content');
    // 元のコンテンツに戻す
    if (planContent.dataset.originalContent) {
        planContent.innerHTML = planContent.dataset.originalContent;
    }
}

function savePlan(button, planId) {
    const planContent = button.closest('.plan_content');

    // フォームからデータを取得
    const updatedData = {
        title: planContent.querySelector('input[name="title"]').value,
        date: planContent.querySelector('input[name="date"]').value,
        money: planContent.querySelector('input[name="money"]').value,
        traffic: planContent.querySelector('input[name="traffic"]').value,
        imageSrc : planContent.querySelector('input[name="imgSrc"]').value,
        spots : planContent.querySelector('input[name="spots"]').value,
        body: planContent.querySelector('textarea[name="body"]').value,
    };

    // Ajaxリクエストを送信
    $.ajax({
        url: '/update/plan/' + planId,
        type: 'POST',
        data: updatedData,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRFトークンを含める
        },
        success: function(response) {
            // 更新が成功した場合の処理（例：ページのリロードやUIの更新）
        },
        error: function(error) {
            // エラー処理
        }
    });

    var updatedSpots = [];
    planContent.querySelectorAll('[name^="spots["]').forEach(function(input) {
        updatedSpots.push(input.value);
    });
}
