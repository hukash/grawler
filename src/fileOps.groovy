def inFile = new File("files/index.php")
def outFile = new File("files/index_2.php")
def counter = 0
def tmpFile = []


inFile.eachLine {
  def myMatcher = (it.toString() =~ /aWYoIWl/)
  if (myMatcher.getCount()) {
    counter++
    println "infected line:--- $it ---"
  } else {
    tmpFile << it.toString()+ "\n"
  }
}
//delete file
outFile.write("<?php\n")
tmpFile.each {
  outFile.append(it.toString())
}

println counter

