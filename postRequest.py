import urllib2, urllib

mydata = [('Name','Heart Rate'),('Data',80)]
mydata = urllib.urlencode(mydata)
path = 'http://wqianyi.com/SSE/PostListener.php'
req = urllib2.Request(path, mydata)
page = urllib2.urlopen(req).read()
print page