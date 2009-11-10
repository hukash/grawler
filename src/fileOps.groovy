def inFile = new File("files/index.php")
def outFile = new File("files/index_2.php")
def counter = 0

//delete file
outFile.write("")

inFile.eachLine {
  def myMatcher = (it.toString() =~ /aWYoIWl/)
  if (myMatcher.getCount()) {
    counter++
    println "infected line:--- $it ---"
  } else {
    outFile.append(it.toString() + "\n")
  }
}
println counter

