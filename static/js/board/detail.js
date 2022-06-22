(function () {
  const btnDel = document.querySelector("#btnDel");
  btnDel.addEventListener("click", (e) => {
    if (confirm("삭제하시겠습니까")) {
      location.href = `del?i_board=${e.target.dataset.i_board}`;
    }
  });
  const btnMod = document.querySelector("#btnMod");
  console.log(btnMod);
  btnMod.addEventListener("click", () => {
    location.href = `mod?i_board=${btnMod.dataset.i_board}`;
    console.log(btnMod.dataset.i_board);
  });
})();
