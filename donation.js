document.addEventListener('DOMContentLoaded', function () {
    loadDonations();
});

function loadDonations() {
    fetch(ajaxurl.url + '?action=get_donations')
        .then(r => r.json())
        .then(data => {
            const tbody = document.getElementById('donationsTableBody');

            if (!tbody) return;

            if (!data.length) {
                tbody.innerHTML = '<tr><td colspan="3">Chưa có dữ liệu</td></tr>';
                return;
            }

            let html = '';
           data.forEach(d => {
    html += `
        <tr>
            <td class="text-start ps-4">
                <span class="donor-name-clean">${d.fullname}</span>
            </td>
            <td>
                <span class="badge bg-light text-dark border">${d.program_name || 'Quỹ chung'}</span>
            </td>
            <td>
                <span class="amount-badge">${formatCurrency(d.amount)}</span>
            </td>
            <td class="text-muted small">
                ${formatDate(d.created_at)}
            </td>
        </tr>`;
});

            tbody.innerHTML = html;
        });
}
