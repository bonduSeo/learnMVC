(function () {
  const trList = document.querySelectorAll("tbody > tr");
  trList.forEach((tr) => {
    console.log(tr);

    const num = tr.dataset.i_board;
    tr.addEventListener("click", () => {
      alert("aa");
      location.href = `detail?i_board=${num}`;
    });
  });
})();
