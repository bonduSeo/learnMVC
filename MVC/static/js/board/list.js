(function () {
  const trList = document.querySelectorAll("tbody > tr");
  // console.log(trList);
  //   //예
  const tr1 = trList[1];
  console.log(tr1.dataset);

  trList.forEach((tr) => {
    const num = tr.dataset.i_board;
    tr.addEventListener("click", () => {
      location.href = `http://localhost/board/detail?iboard=${num}`;
    });
  });
})();
