/* Make some magic :P */

function _(el)
{
  return document.querySelector(el);
}
    
function openDiv(sender)
{
  sender.classList.toggle("opened");
  _(".opening-div").classList.toggle("opened");
}
