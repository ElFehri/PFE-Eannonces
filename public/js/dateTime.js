function setDateAndTime() {
    const date = new Date();
    const daysOfWeek = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
    const dayOfWeek = daysOfWeek[date.getDay()];
    const months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
    const month = months[date.getMonth()];
    const dayOfMonth = date.getDate();
    const year = date.getFullYear();
    const formattedDate = `${dayOfWeek}, ${dayOfMonth} ${month} ${year}`;
    const hours = date.getHours();
    const minutes = date.getMinutes();
    const seconds = date.getSeconds();
    const formattedTime = `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
    document.getElementById('date').innerHTML = formattedDate;
    document.getElementById('time').innerHTML = formattedTime;
}
setInterval(setDateAndTime, 1000);