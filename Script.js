// Example: Dynamically update investor list every 5 seconds
document.addEventListener('DOMContentLoaded', () => {
    const investorList = document.getElementById('investor-list');

    if(investorList){
        // Example: Add a new investor dynamically
        setInterval(() => {
            const newInvestor = document.createElement('li');
            const randomAmount = Math.floor(Math.random() * 1000) + 100;
            newInvestor.textContent = `Investor ${Math.floor(Math.random()*100)} - $${randomAmount}`;
            investorList.appendChild(newInvestor);

            // Keep only latest 10 investors
            if(investorList.children.length > 10){
                investorList.removeChild(investorList.firstChild);
            }
        }, 5000);
    }
});