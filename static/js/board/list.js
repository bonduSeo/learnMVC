(function () {
  const trList = document.querySelectorAll("tbody > tr");
  trList.forEach((tr) => {
    const num = tr.dataset.i_board;
    tr.addEventListener("click", () => {
      location.href = `detail?iboard=${num}`;
    });
  });
})();
