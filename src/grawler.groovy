/**
 * User: hukash
 * Date: 03.11.2009
 */

class Grawler {
  def counter = 0
  def results = []

  def searchForInjection(pattern, dir, filetype) {
    new File(dir).eachFileRecurse {
      if (it.toString().endsWith(filetype)) {
        try {
          def myMatcher = (it.getText() =~ pattern)
          if (myMatcher.getCount()) {
            counter++
            results << it
          }
        }
        catch (IOException e) {
          println e
        }
      }
    }
  }

  def viewResults() {
    results.each {
      def fileName = it.toString()
      println "Found: $fileName"
    }
    println counter
  }

  def deleteInfectedChunks(pattern) {
    def inFile = new File("files/index.php")
    def outFile = new File("files/index_2.php")
    def counter = 0

    //delete file
    outFile.write("")

    inFile.eachLine {
      def myMatcher = (it.toString() =~ pattern)
      if (myMatcher.getCount()) {
        counter++
        println "infected line: $it"
      } else {
        outFile.append(it.toString() + "\n")
      }
    }
    println counter
  }
}

def grawler = new Grawler()
grawler.searchForInjection(/aWYoIWl/, "/Users/lukas/Workspace/grawler/", "php")
grawler.viewResults()
grawler.deleteInfectedChunks(/aWYoIWl/)

// delete lines where the pattern applies

// backup files