/**
 * Created by IntelliJ IDEA.
 * User: lso
 * Date: 03.11.2009
 * Time: 12:52:29
 * To change this template use File | Settings | File Templates.
 */

def searchFor = /aWYoIWl/

new File('.').eachFileRecurse {
  if (it.toString().endsWith("php")){
    def myMatcher = (it.getText() =~ searchFor)
    if (myMatcher.getCount()){
      println "Found in file: {$it}"
    }
  }
}
