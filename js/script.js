//------------------------------------------------------------------------Tabs
const tabsButton = document.querySelectorAll('.tabs-button');
const tabsContent = document.querySelectorAll('.tabs-content');

tabsButton.forEach((tab, index) => {
  tab.addEventListener('click', () => {
    tabsButton.forEach(tab => {tab.classList.remove('active-tab')});
    tab.classList.add('active-tab');
    
    tabsContent.forEach(content => {content.classList.remove('active-tab')})
    tabsContent[index].classList.add('active-tab');
  });
});
//------------------------------------------------------------------------Tabs