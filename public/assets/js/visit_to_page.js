function updateVisitCount(){
	let fullPath = window.location.pathname;
	let pageFullName = fullPath.split('/').pop();

	let pageName = pageFullName.split('.')[0];
	
	let visitCount = localStorage.getItem(pageName + 'Count');
	let sessionCount = sessionStorage.getItem(pageName + 'SessCount');
	
	if (!visitCount) visitCount = 0;
	if (!sessionCount) sessionCount = 0;
	
	visitCount++;
	sessionCount++;
	
	localStorage.setItem((pageName + 'Count'), visitCount);
	sessionStorage.setItem((pageName + 'SessCount'), sessionCount);
	
	/*alert(pageName + 'Count');*/
}

updateVisitCount();